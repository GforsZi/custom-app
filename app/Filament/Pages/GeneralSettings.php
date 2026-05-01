<?php

namespace App\Filament\Pages;

use App\Models\AppSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use UnitEnum;

class GeneralSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationLabel = 'Pangaturan Umum';
    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan Aplikasi';
    protected static ?int $navigationSort = 1;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cog6Tooth;

    protected string $view = 'filament.pages.general-settings';

    public array $data = [];
    public $setting = [];

    public function mount(): void
    {
        $this->setting = AppSetting::get();
        $this->form->fill($this->setting->pluck('value', 'key')->toArray());
    }

    public function form(Schema $schema): Schema
    {
        $contentFields = [];
        $mediaFields = [];

        foreach ($this->setting as $data) {
            if ($field = $this->makeSettingField($data)) {
                if ($data->type === 'image') {
                    $mediaFields[] = $field;
                } else {
                    $contentFields[] = $field;
                }
            }
        }

        return $schema
            ->components([
                Group::make([
                    Section::make('Konten & Teks')
                        ->description(
                            'Pengaturan berbasis teks dan editor konten.',
                        )
                        ->icon('heroicon-o-document-text')
                        ->schema($contentFields)
                        ->columnSpan(2),

                    Section::make('Media Aplikasi')
                        ->description('Logo, icon, dan aset visual lainnya.')
                        ->icon('heroicon-o-photo')
                        ->schema($mediaFields),
                ])
                    ->columns(3)
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    private function makeSettingField($data)
    {
        return match ($data->type) {
            'text' => TextInput::make($data->key)
                ->label($data->title)
                ->required(),

            'richeditor' => RichEditor::make($data->key)
                ->toolbarButtons(['bold', 'italic'])
                ->label($data->title)
                ->required(),

            'image' => FileUpload::make($data->key)
                ->image()
                ->label($data->title)
                ->imageEditor()
                ->imageEditorAspectRatioOptions(['16:9', '4:3', '1:1'])
                ->directory('/app'),

            default => null,
        };
    }

    private function saveSetting(string $key, string $type, mixed $value): void
    {
        switch ($type) {
            case 'text':
                AppSetting::set($key, $value);
                break;

            case 'richeditor':
                $save = RichContentRenderer::make($value)->toHtml();
                AppSetting::set($key, $save);
                break;

            case 'image':
                if (is_string($value)) {
                    return;
                }

                if (empty($value)) {
                    $old = AppSetting::getValue($key);

                    if ($old && Storage::disk('public')->exists($old)) {
                        Storage::disk('public')->delete($old);
                    }

                    AppSetting::set($key, null);
                    return;
                }

                $file =
                    $value instanceof TemporaryUploadedFile
                        ? $value
                        : collect($value)->first();

                if (!($file instanceof TemporaryUploadedFile)) {
                    return;
                }

                $old = AppSetting::getValue($key);
                if ($old && Storage::disk('public')->exists($old)) {
                    Storage::disk('public')->delete($old);
                }

                $filename =
                    uniqid($key . '_') .
                    '.' .
                    $file->getClientOriginalExtension();
                $path = $file->storeAs('app', $filename, 'public');

                AppSetting::set($key, $path);
                break;
        }
    }

    public function save(): void
    {
        foreach ($this->setting as $setting) {
            $key = $setting->key;
            $type = $setting->type;
            $value = $this->data[$key] ?? null;

            $this->saveSetting($key, $type, $value);
        }

        Notification::make()->title('Berhasil')->success()->send();
    }
}

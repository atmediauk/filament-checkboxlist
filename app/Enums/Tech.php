<?php

namespace App\Enums;

use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\HtmlString;

enum Tech: string implements HasLabel, HasDescription
{
    case Tailwind = "Tailwind";
    case Alpine = "Alpine";
    case Laravel = "Laravel";
    case Livewire = "Livewire";


    public function getLabel(): ?string
    {    
        return match ($this) {
            self::Tailwind => 'Tailwind',
            self::Alpine => 'Alpine',
            self::Laravel => 'Laravel',
            self::Livewire => 'Livewire',
        };
    }

    public function getDescription(): ?string
    {    
        return match ($this) {
            self::Tailwind => new HtmlString('A utility-first CSS framework for rapidly building modern websites without ever leaving your HTML.'),
            self::Alpine => new HtmlString('A rugged, minimal tool for composing behavior <strong>directly in your markup</strong>.'),
            self::Laravel => str('A **web application** framework with expressive, elegant syntax.')->inlineMarkdown()->toHtmlString(),
            self::Livewire => 'A full-stack framework for Laravel building dynamic interfaces simple, without leaving the comfort of Laravel.',
        };
    }
}
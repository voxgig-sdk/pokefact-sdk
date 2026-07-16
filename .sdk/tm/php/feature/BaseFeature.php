<?php
declare(strict_types=1);

// Pokefact SDK base feature

class PokefactBaseFeature
{
    public string $version;
    public string $name;
    public bool $active;

    // Positions this feature when added via the client `extend` option:
    // "__before__" / "__after__" / "__replace__" name an already-added
    // feature (mirrors the ts feature `_options`). Declared so setting it
    // on an extension instance avoids the dynamic-property deprecation.
    public ?array $_options = null;

    public function __construct()
    {
        $this->version = '0.0.1';
        $this->name = 'base';
        $this->active = true;
    }

    public function get_version(): string { return $this->version; }
    public function get_name(): string { return $this->name; }
    public function get_active(): bool { return $this->active; }

    public function init(PokefactContext $ctx, array $options): void {}
    public function PostConstruct(PokefactContext $ctx): void {}
    public function PostConstructEntity(PokefactContext $ctx): void {}
    public function SetData(PokefactContext $ctx): void {}
    public function GetData(PokefactContext $ctx): void {}
    public function GetMatch(PokefactContext $ctx): void {}
    public function SetMatch(PokefactContext $ctx): void {}
    public function PrePoint(PokefactContext $ctx): void {}
    public function PreSpec(PokefactContext $ctx): void {}
    public function PreRequest(PokefactContext $ctx): void {}
    public function PreResponse(PokefactContext $ctx): void {}
    public function PreResult(PokefactContext $ctx): void {}
    public function PreDone(PokefactContext $ctx): void {}
    public function PreUnexpected(PokefactContext $ctx): void {}
}

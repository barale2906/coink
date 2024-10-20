<?php

namespace App\Providers;

use App\Contracts\DepartamentoInterface;
use App\Contracts\MunicipioInterface;
use App\Contracts\PaisInterface;
use App\Contracts\UsuarioInterface;
use App\Services\DepartamentoService;
use App\Services\MunicipioService;
use App\Services\PaisService;
use App\Services\UsuarioService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaisInterface::class, PaisService::class);
        $this->app->bind(DepartamentoInterface::class, DepartamentoService::class);
        $this->app->bind(MunicipioInterface::class, MunicipioService::class);
        $this->app->bind(UsuarioInterface::class, UsuarioService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

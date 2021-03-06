<?php

namespace Dizatech\Transaction;

use Dizatech\Transaction\Core\TransactionManager;
use Dizatech\Transaction\Facades\Transaction;
use Illuminate\Support\ServiceProvider;

class TransactionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Transaction::shouldProxyTo(TransactionManager::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__.'/config/dizatech_transaction.php' =>config_path('dizatech_transaction.php')
        ], 'dizatech_transaction');
    }
}

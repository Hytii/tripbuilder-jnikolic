<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Closure;

/**
 * Class DbTransactionnable
 *
 * @package Traits
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
trait DbTransactionnable
{

    /**
     * @var
     */
    public static $enableTransactions = true;

    protected function openTransaction()
    {
        if (static::$enableTransactions) {
            DB::beginTransaction();
        }
    }

    /**
     * @internal param null $toLevel
     */
    protected function rollbackTransaction()
    {
        if (static::$enableTransactions) {
            DB::rollBack();
        }
    }

    protected function commitTransaction()
    {
        if (static::$enableTransactions) {
            DB::commit();
        }
    }

    /**
     * @param Closure $callback
     * @param int     $attempts
     */
    protected function transaction(Closure $callback, $attempts = 1)
    {
        DB::transaction($callback, $attempts);
    }
}
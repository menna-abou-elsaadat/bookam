<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['unit_id', 'expense_category_id', 'amount','currency','expense_date','due_date','is_paid'])]
class UnitExpense extends Model
{
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function expenseCategory()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}

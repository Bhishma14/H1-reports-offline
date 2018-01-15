<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected  $table = "reports";
    
    public function bounty_program() {
        return BountyProgram::where('handle', $this->bounty_program)->first();
    }
    
}

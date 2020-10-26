<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $book_id
 * @property string $issue_date
 * @property string $due_date
 * @property string $return_date
 * @property string $status
 * @property float $fine
 * @property string $created_at
 * @property string $updated_at
 * @property Book $book
 */
class Issue extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';
    protected $dates = ['due_date', 'issue_date', 'return_date'];

    /**
     * @var array
     */
    protected $fillable = ['book_id', 'issue_date', 'due_date', 'return_date', 'status', 'fine', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function getStatusTitleAttribute(){
        if($this->status == 1){
            return 'Issued';
        }elseif ($this->status == 2){
            return 'Returned';
        }elseif ($this->status == 3){
            return 'Late Returned';
        }else
        {
            return false;
        }
    }


}

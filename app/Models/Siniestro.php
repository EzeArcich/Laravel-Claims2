<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use App\Models\File;
use App\Models\User;

use OwenIt\Auditing\Contracts\Auditable;




class Siniestro extends Model implements Auditable
{
    use HasFactory;
    use Userstamps;
    use \OwenIt\Auditing\Auditable;

   
    // protected $fillable = ['created_by', 'lugar', 'enviado', 'nrocorto', 'nombretaller', 'imagen', 'url_siniestro', 'telefonoperito', 'emailperito', 'file', 'updated_by', 'deleted_by', 'siniestro', 'patente', 'cliente', 'fechaip', 'estado', 'modalidad',
    // 'observaciones', 'fechacierre', 'compania', 'asignado_a', 'contacto', 'codigoinspeccion', 'inspector', 'direccion', 'localidad', 'telefono', 'motivo', 'link', 'enviarorden', 'email'];
     protected $guarded = ['siniestro_id'];

   

   public function files()
   {
       return $this->hasMany('App\models\File');
   }

   public function User()
    {
        return $this->BelongsTo('App\models\User');
    }

    public function comentarios()
    {
        return $this->hasMany('App\models\Comentario');
    }


}

    


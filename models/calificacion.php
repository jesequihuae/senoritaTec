<?php    class calificacion extends Illuminate\Database\Eloquent\Model{        protected $table = 'calificacion';        public $timestamps = false;        public function getCandidata(){            return $this->belongsTo('candidata','id_candidata','idcandidata');        }        public function juez()        {            return $this->hasOne('c_juez','idjuez','id_juez');        }    }?>
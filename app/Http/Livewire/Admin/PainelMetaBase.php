<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class PainelMetaBase extends Component
{
    public $METABASE_SITE_URL = "http://metabase.pmbv.rr.gov.br";

    public $METABASE_SECRET_KEY = "f4811079ca5b921278e97b597cca1b026c49751fd5a288d8be09f99934edc54b";

    public $iframeUrl = "";

    public function mount()
    {
        // dd("belou");
    }
    

    public function render()
    {
        return view('admin.painel-meta-base');
    }
}

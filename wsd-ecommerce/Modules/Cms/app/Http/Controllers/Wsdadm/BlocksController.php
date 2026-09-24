<?php

namespace Modules\Cms\Http\Controllers\Wsdadm;

use Idea\Framework\Admin\AdminController;
use Idea\Framework\Repository\Cms\CmsBlockRepository;

class BlocksController extends AdminController
{

    // Botao de insert
    public bool $buttonInsert = true;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('wsdadm.partials.grids', ['componentName' => 'cms::grids.blocks-grid']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert()
    {
        // Retorna a View
        return view('wsdadm.partials.forms', [
            'componentName' => 'cms::form.blocks-form',
            'data' => []
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        // Retorna os dados da pagina criada/atualizada
        $data = CmsBlockRepository::getData()
            ->where(['block_id' => $id])
            ->get();

        if ($data) {
            // Retorna a View
            return view('wsdadm.partials.forms', [
                'componentName' => 'cms::form.blocks-form',
                'data' => $data->first()->toArray()
            ]);

        }

        return redirect()->route(route('wsdadm.cms.blocks'));


    }

}

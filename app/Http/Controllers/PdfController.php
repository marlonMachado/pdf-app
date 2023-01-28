<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdf = Pdf::paginate();
        return view("index", compact('pdf'));
    }

    public function savePdf(Request $request)
    {
        if ($request->hasFile("urlPdf")) {
            $file = $request->file("urlPdf");
            $nameOrigi = $file->getClientOriginalName();
            $nameOrigi = trim($nameOrigi, ".pdf");
            $nombre =  $nameOrigi . time() . "." . $file->guessExtension();
            $ruta = public_path("" . $nombre);
            if ($file->guessExtension() == "pdf") {
                copy($file, $ruta);
                //$this->store($request);
                $this->store($nombre);
            } else { 

                session()->flash('status', 'No es un documento pdf');
                return redirect()->route('index.index');
            }
            return redirect()->route('index.index');
        } else {

            session()->flash('status', 'No ha seleccionado documento');
            return redirect()->route('index.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($nombre)
    {
        $pdf = new Pdf();
        $pdf->name = $nombre;
        $pdf->save();
        return redirect()->route('index.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pdfSel = Pdf::find($id);
        return view("pdfEdit", compact('pdfSel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $paramen)
    {

        $pdfSel = Pdf::find($paramen);
        $nameOld = $pdfSel->name;
        //$pdfSel->numero=$request->idPdf_edit;
        $pdfSel->name = $request->namePdf_edit;
        rename(public_path("" . $nameOld), public_path("" . $request->namePdf_edit));
        $pdfSel->save();
        return redirect()->route('index.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $paramen)
    {
        $pdfSel = Pdf::find($paramen);
        $namePdf = $pdfSel->name;
        $pdfSel->delete();
        unlink(public_path("" . $namePdf));
        return redirect()->route('index.index');
    }
}

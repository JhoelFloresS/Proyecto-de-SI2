<?php

namespace App\Http\Controllers\tenant;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDO;

class BackupController extends Controller
{
    
    private function obtenerTablasDeUnaBaseDeDatos($host, $usuario, $pass, $nombreDeLaBaseDeDatos)
    {
        try {
            $base_de_datos = new PDO(
                "mysql:host=$host;dbname=$nombreDeLaBaseDeDatos",
                $usuario,
                $pass
            );
        } catch (Exception $e) {
            echo "Ocurrió algo con la base de datos: " . $e->getMessage();
        }
        
        return $base_de_datos
            ->query("SELECT table_name AS nombre FROM information_schema.tables WHERE table_schema = '$nombreDeLaBaseDeDatos';")
            ->fetchAll(PDO::FETCH_COLUMN);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filesystem = new Filesystem();
        $filesystem->deleteDirectory(storage_path("/app/backup/"));

        $tablas = $this->obtenerTablasDeUnaBaseDeDatos(env('DB_HOST'),env('DB_USERNAME'),env('DB_PASSWORD'),tenant()->tenancy_db_name);
        return view('tenant.backups.index', compact('tablas'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $nombre_tablas = " ";
        if (!is_null($request->tablas)) {
            foreach ($request->tablas as  $tabla) {
                $nombre_tablas .= $tabla . " ";
            }
        }


        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".sql";
        $storageAt = storage_path("/app/backup/");
        
        // Create backup folder and set permission if not exist.
        if (!file_exists($storageAt)) {
            mkdir($storageAt);
        }
        
       
        $tenancy_db_name = tenant()->tenancy_db_name;
       
        /* tienen que agregar la ruta donde se encuentra mysqldump.exe en la variable  de entorno Path de windows
        para que pueda ejecutar mysqldump, por ejemplo C:\xampp\mysql\bin, luego reiniciar la compu */

        $command = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" .
            env('DB_HOST') . " " . $tenancy_db_name . $nombre_tablas . ">" . $storageAt . $filename;
        exec($command);
        
        $download_path = $storageAt . $filename;
        return response()->download($download_path);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

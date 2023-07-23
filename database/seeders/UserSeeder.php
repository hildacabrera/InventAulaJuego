<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos=
        [
            //Tabla Roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //Tabla Usuarios
            'ver-Usuario',
            'crear-Usuario',
            'editar-Usuario',
            'borrar-Usuario',
              //Tabla Ingresos
            'ver-Ingreso',
            'crear-Ingreso',
            'editar-Ingreso',
            'borrar-Ingreso',
            //Tabla Materiales
            'ver-Material',
            'crear-Material',
            'editar-Material',
            'borrar-Material',
            //Tabla Tipo_Materiales
            'ver-Tipo_Material',
            'crear-Tipo_Material',
            'editar-Tipo_Material',
            'borrar-Tipo_Material',
            //Tabla Prestamos
            'ver-Prestamo',
            'crear-Prestamo',
            'editar-Prestamo',
            'borrar-Prestamo',
            //Tabla Gestores
            'ver-Gestor',
            'crear-Gestor',
            'editar-Gestor',
            'borrar-Gestor',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}

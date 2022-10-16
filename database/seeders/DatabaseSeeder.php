<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    protected $business = [
        "ACTIVIDADES DEPORTIVAS",
        "ADMINISTRACIÓN",
        "AGRO-ALIMENTARIO",
        "AGRO-INDUSTRIAL",
        "ALIMENTOS, BEBIDAS Y TABACO",
        "ARTES GRÁFICAS",
        "AUTOMOTRIZ",
        "CAUCHO Y PLÁSTICO",
        "CONSTRUCCIÓN",
        "COMERCIO Y TURISMO",
        "EDUCACIÓN",
        "ELECTRICIDAD, GAS Y AGUA",
        "ENERGÍA",
        "IMAGEN PERSONAL",
        "IMAGEN Y SONIDO",
        "INDUSTRIAL",
        "INDUSTRIAS METÁLICAS BÁSICAS",
        "INFORMÁTICA Y SOFTWARE",
        "LECHERA",
        "LOGÍSTICA Y TRANSPORTE",
        "MANUFACTURERA",
        "MAQUILADORA",
        "MEDIO AMBIENTE",
        "MINERÍA",
        "MUEBLERA, MADERA Y SUS PRODUCTOS"
    ];

    protected $languages = [
        "NINGUNO",
        "ESPAÑOL",
        "INGLÉS",
        "CHINO MANDARÍN",
        "FRANCÉS",
        "ÁRABE",
        "BENGALI",
        "RUSO",
        "PORTUGUÉS",
        "ALEMÁN",
        "JAPONÉS",
        "COREANO",
        "ITALIANO",
        "TARAHUMARA",
        "TURCO"
    ];

    protected $careers = [
        "CONTADOR PÚBLICO",
        "INGENIERÍA SISTEMAS COMPUTACIONALES",
        "INGENIERÍA ELÉCTRICA",
        "INGENIERÍA ELECTRÓNICA",
        "INGENIERÍA ENERGÍAS RENOVABLES",
        "INGENIERÍA GESTIÓN EMPRESARIAL",
        "INGENIERÍA INDUSTRIAL",
        "INGENIERÍA LOGÍSTICA",
        "INGENIERÍA MATERIALES",
        "INGENIERÍA MECATRÓNICA",
        "INGENIERÍA MECÁNICA",
        "INGENIERÍA QUÍMICA",
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->business as $business) {
            \App\Models\Business::create([
                'name' => mb_strtoupper($business, 'UTF-8')
            ]);
        }

        foreach ($this->languages as $language) {
            \App\Models\Language::create([
                'name' => mb_strtoupper($language, 'UTF-8')
            ]);
        }

        //create a career with property
        foreach ($this->careers as $career) {
            $career = \App\Models\Career::create([
                'name' => mb_strtoupper($career, 'UTF-8')
            ]);
        }

        \App\Models\User::create([
            'name' => 'ADMINISTRADOR',
            'email' => env('MAIL_MAIN'),
            'password' => Hash::make('12345678'),
            'role'  => 'admin',
        ]);
    }
}

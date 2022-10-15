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

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->business as $business) {
            \App\Models\Business::create([
                'name' => $business
            ]);
        }

        foreach ($this->languages as $language) {
            \App\Models\Language::create([
                'name' => $language
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

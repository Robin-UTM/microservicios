<?php

namespace App\Controllers;
use CodeIgniter\Controller;
class Home extends BaseController
{
    
   public function index(): string
    {
        return view('welcome_message');
    }

    public function verpersona(){       
        $persona = array(
            'Id' => '01',
            'Nombre' => 'Robinson Rezabala',
            'Edad' => 29,
            'Ciudad' => 'Portoviejo',
            'Ocupacion' => 'Estudiante',
            'Hobbies' => array('Leer', 'Viajar', 'Programar'),
            'Contacto' => array(
                'Email' => 'rrezabala6714@utm.edu,ec',
                'Telefono' => '123-456-7890'
            )
        );
        
       return $this->response->setJson($persona);
    }
    
    public function verpersona2() {
        $persona2 = array(
            'Id' => '02',
            'Nombre' => 'María López',
            'Edad' => 35,
            'Ciudad' => 'Quito',
            'Ocupacion' => 'Profesional',
            'Hobbies' => array('Bailar', 'Pintar', 'Deportes'),
            'Contacto' => array(
                'Email' => 'mlopez@example.com',
                'Telefono' => '987-654-3210'
            )
        );
    
        return $this->response->setJson($persona2);
    }

    public function verpersona3() {
        $persona3 = array(
            'Id' => '03',
            'Nombre' => 'Juan Pérez',
            'Edad' => 40,
            'Ciudad' => 'Guayaquil',
            'Ocupacion' => 'Empresario',
            'Hobbies' => array('Cocinar', 'Nadar', 'Leer'),
            'Contacto' => array(
                'Email' => 'jperez@example.com',
                'Telefono' => '555-123-4567'
            )
        );
    
        return $this->response->setJson($persona3);
    }

    public function verMascota(){       
    $mascota = array(
        'Id' => 'M01',
        'Nombre' => 'Whiskers',
        'Edad' => 3,
        'Tipo' => 'Gato',
        'Color' => 'Atigrado',
        'Habilidades' => array('Saltar', 'Cazar', 'Ronronear'),
        'Dueño' => array(
            'Nombre' => 'Robinson Rezabala',
            'Contacto' => array(
                'Email' => 'rrezabala6714@utm.edu,ec',
                'Telefono' => '123-456-7890'
            )
        )
    );  
    
    return $this->response->setJson($mascota);
}

public function verLibro(){       
    $libro = array(
        'ISBN' => '978-1-2345-6789-0',
        'Titulo' => 'El Prisionero de Azkaban',
        'Autor' => 'J.K. Rowling',
        'Genero' => 'Fantasía',
        'Paginas' => 384,
        'Editorial' => 'Salamandra',
        'AñoPublicacion' => 1999,
        'Resumen' => 'El tercer libro de la serie de Harry Potter, donde enfrenta nuevos desafíos en Hogwarts.',
        'Lectores' => array('Robinson Rezabala', 'Amelia García', 'Carlos Martínez'),
    );  
    // Puedes personalizar esta función según tus necesidades.
    return $this->response->setJson($libro);
}


    public function buscar($n = NULL) {
    if (isset($n)) {
        echo "Valor recibido: " . $n;
        echo "\n \n\n";
        switch ($n) {
            case 1:
                return $this->verpersona();
                break;
            case 2:
                return $this->verpersona2();
                break;
            case 3:
                return $this->verpersona3();
                break;
            default:
                echo "Número de persona no válido.";
                break;
        }
    } else {
        echo "No se recibió ningún valor.";
    }
}  
  





    public function test()
    {
        // Cargamos la clase de la base de datos
        $db = \Config\Database::connect();

        // Verificamos si la conexión es exitosa
        if ($db->connect())
        {
            echo 'Conexión exitosa';
        }
        else
        {
            echo 'No se pudo conectar a la base de datos';
        }
    }
    

    public function insertarPersona()
    {
        $persona3 = array(
            'Id' => '03',
            'Nombre' => 'Juan Pérez',
            'Edad' => 40,
            'Ciudad' => 'Guayaquil',
            'Ocupacion' => 'Empresario',
            'Contacto' => array(
                'Email' => 'jperez@example.com',
                'Telefono' => '555-123-4567'
            )
        );

        // Extraer datos de contacto
        $email = $persona3['Contacto']['Email'];
        $telefono = $persona3['Contacto']['Telefono'];

        // Acceder a la base de datos
        $db = \Config\Database::connect();

        // Insertar persona en la base de datos
        $db->table('Persona')->insert([
            'Id' => $persona3['Id'],
            'Nombre' => $persona3['Nombre'],
            'Edad' => $persona3['Edad'],
            'Ciudad' => $persona3['Ciudad'],
            'Ocupacion' => $persona3['Ocupacion'],
            'Email' => $email,
            'Telefono' => $telefono,
        ]);

        return $this->response->setJSON(['message' => 'Persona insertada correctamente']);
    }

}

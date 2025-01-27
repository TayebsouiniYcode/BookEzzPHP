<?php 

class BootstrapUI {

    public static function table(array $list){
        return '
            <table class="table">
                <thead>
                    <tr>
                        ' . self::th($list) .'
                    </tr>
                </thead>
            ';
    }

    public static function th(array $list){
        $ListOfth = '';

        //$List[0] le premier Objet;
        foreach((array) $list[0] as $key => $value) {
            $ListOfth .= '<th scope="col">' . $key . '</th>';
        }
    }





    

      
//       <th scope="col">First</th>
//       <th scope="col">Last</th>
//       <th scope="col">Handle</th>

//   <tbody>
//     <tr>
//       <th scope="row">1</th>
//       <td>Mark</td>
//       <td>Otto</td>
//       <td>@mdo</td>
//     </tr>
//     <tr>
//       <th scope="row">2</th>
//       <td>Jacob</td>
//       <td>Thornton</td>
//       <td>@fat</td>
//     </tr>
//     <tr>
//       <th scope="row">3</th>
//       <td colspan="2">Larry the Bird</td>
//       <td>@twitter</td>
//     </tr>
//   </tbody>
// </table>
}
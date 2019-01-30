<?php
/**
 * Created by PhpStorm.
 * User: Denzhe Sadiki
 * Date: 5/7/2016
 * Time: 3:38 PM
 */




namespace Controllers;



use Core\Controller;
use Core\View;;
use Core\Model;



include ("Google\Client.php");
class Add_Books extends Controller
{


    public function __construct()
    {
        parent::__construct();


    }


    public function index()
    {

    }


    public function addBooks()

    {

        $Books =new SearchBooks();
        $Books->Test();

        // $key = "AIzaSyC-FJUYBaYFY8eHH5LwFo4GeWePzhmHokg";
       // $client = new Google_Client();
        //$client->setApplicationName("Rate That");
       // $client->setDeveloperKey($key);
      //  $service = new Google_Service_Books($client);

      //  $optParams = array('filter' => 'free-ebooks');
      //  $results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

     //   foreach ($results as $item) {
      //      echo $item['volumeInfo']['title'], "<br /> \n";
            ///new Nerdstorm\GoogleBooks\Api\VolumesSearch('AIzaSyC-FJUYBaYFY8eHH5LwFo4GeWePzhmHokg');
            // $volume_search_api = new VolumesSearch('AIzaSyC-FJUYBaYFY8eHH5LwFo4GeWePzhmHokg	');
            //   $lookup_manager =VolumeLookupManager($volume_search_api);
            //  $volumes =  $lookup_manager->lookupByTitle('Systems Analysis and Design');
     //   }

        }
    }
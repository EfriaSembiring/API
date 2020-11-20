<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class NewsController extends Controller
{
public function getData(){
 $client = new Client();
 $request = $client->get('https://newsapi.org/v2/top-headlines?country=id&apiKey=53fedc2f449741b4b8430adf708bfd9f');
 $response = $request->getBody();
 $result = json_decode($response);
 return view('home',['artikel'=>$result->articles]);
}
public function searchData(Request $request){
    $client = new Client();
    $query = $request->keyword;
    $req = $client->get('https://newsapi.org/v2/topheadlines?country=id&apiKey=53fedc2f449741b4b8430adf708bfd9f&q='.$query);
    $response = $req->getBody();
    $result = json_decode($response);
    return view('home',['artikel'=>$result->articles]);
   }
   
}
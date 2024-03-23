<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Article;
use App\models\Filier;
use App\models\Evenement;
use App\models\Categorie;
use App\models\Tag;
use App\models\Secteur;
use App\Traits\Refactor;
class apiController extends Controller

{
    use Refactor;
//Articles ApiS
    public function getArticleById($id){
        $article =Article::where("id",$id)->where('visibility',1)->first();
        if ( $article ){ 
            return  response()->json(['status'=>'success' ,'data'=>$this->refactorOneArticle($article)]) ;
        }else{
           return response('',404);
        }
    }
    public function getVisibleArticles(){
        return response()->json(['status'=>'success' ,'data'=>$this->refactorManyArticles(Article::visibleArticles())]);
    }
    public function getOrderedArticles(){
        return response()->json(['status'=>'success' ,'data'=>$this->refactorManyArticles(Article::visibleArticles())]);
    }
    
    public function getLatestArticle(){
        return response()->json(['status'=>'success' ,'data'=>$this->refactorOneArticle(Article::latestArticle())]);
    }
//events Apis
    public function getVisibleEvents(){
        return response()->json(['status'=>'success' ,'data'=>$this->refactorManyEvents(Evenement::VisibleEvents())]);
    }
     public function getEventById($id){
        $event = Evenement::find($id);
        if ($event){
             return response()->json(['status'=>'success' ,'data'=>$this->refactorOneEvent($event)]);
        }else{
            return response('',404);

        }
    }
//filiers Apis
    public function getActiveFiliers(){
        return response()->json($this->refactorManyFiliers(Filier::ActiveFiliers()));
    }
    public function getAllFiliers(){
        return response()->json(['status'=>'success' ,'data'=>$this->refactorManyFiliers(Filier::All())]);
    }
  
    public function getGroupediliers(){
        return response()->json(['status'=>'success' ,'data'=>(Filier::GroupedFiliers())]);
    }
    public function getFilierById($id){
        $fillier =Filier::find($id);
        if ($fillier){
            return response()->json(['status'=>'success' ,'data'=>$this->refactorOneFilier($fillier)]);
        }else{
            return response('',404);
        }
    }
      public function getFiliersBySecteurs($id){
        return response()->json(['status'=>'success' ,'data'=>$this->refactorManyFiliers(Filier::filiersBySecteurs($id))]);
    }
//secteurs
    public function getAllSeteurs(){
            return response()->json(['status'=>'success' ,'data'=>(Secteur::NameSecteur())]);
        }
    public function getAllTags(){
            return response()->json(['status'=>'success' ,'data'=>(Tag::tags())]);
        }
    public function getAllcategories(){
            return response()->json(['status'=>'success' ,'data'=>(Categorie::categories())]);
        }
}

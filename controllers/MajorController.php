<?
namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Major;

class MajorController extends Controller
{
  public function actionIndex()
  {
    $query = Major::find();

    $pagination = new Pagination([
      'defaultPageSize' => 5,
      'totalCount' => $query->count(),
      ]);
      
    $majors = $query->orderBy('name')
      ->offset($pagination->offset)
      ->limit($pagination->limit)
      ->all();

    return $this->render('index',[
      'majors' => $majors,
      'pagination' => $pagination,
      ]);
  }
}
?>

<?php

namespace app\controllers;

use Yii;
use app\models\Convocatorias;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\FormUpload;
use app\widgets\Alert;
use phpDocumentor\Reflection\Types\String_;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * ConvocatoriasController implements the CRUD actions for Convocatorias model.
 */
class ConvocatoriasController extends Controller
{
    var $ruta;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Convocatorias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Convocatorias::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Convocatorias model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Convocatorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Convocatorias();
        $msg = null;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->file = UploadedFile::getInstances($model, 'file');
            
            $id = $model->id;
            if ($model->file) {
                foreach ($model->file as $file) {
                    $image_name = $model->nombre.'.'.$file->extension;
                    $model = $this->findModel($id);
                    $model->ruta = 'archivos/'.$image_name;
                    $file->saveAs('archivos/'.$image_name);
                    $model->save();
                    $msg = "Enhorabuena, subida realizada con éxito";
                    
                }
               
               
                return $this->redirect(['view', 'id' => $id, "msg" => $msg]);
            }else{
                var_dump($model->file);
                $msg = "errooooooooooooooooooooorrrrrrrr";
                return $this->render('create', [
                    'model' => $model,"msg" => $msg
                ]);
            }
            $msg = "Enhorabuena, subida realizada con éxito";
            return $this->redirect(['view', 'id' => $model->id, "msg" => $msg]);
        }else{
            //$msg = $_POST['Convocatorias']['file'] . "";
            
            //var_dump($model);
        }
        
        return $this->render('create', [
            'model' => $model,"msg" => $msg
        ]);
    }

    /**
     * Updates an existing Convocatorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $msg = null;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->file = UploadedFile::getInstances($model, 'file');
            
            $id = $model->id;
            if ($model->file) {
                foreach ($model->file as $file) {
                    $image_name = $model->nombre.'.'.$file->extension;
                    $model = $this->findModel($id);
                    $model->ruta = 'archivos/'.$image_name;
                    $file->saveAs('archivos/'.$image_name);
                    $model->save();
                    $msg = "Enhorabuena, subida realizada con éxito";
                    
                }
            }
            return $this->redirect(['view', 'id' => $model->id, "msg" => $msg]);
        }else{
            //$msg = $_FILES;
            //var_dump($model);
        }

        return $this->render('update', [
            'model' => $model,"msg" => $msg
        ]);
    }

    /**
     * Deletes an existing Convocatorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Convocatorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Convocatorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Convocatorias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpload()
    {
        $model = new Convocatorias();
        $msg = null;

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstances($model, 'file');

            if ($model->file && $model->validate()) {
                foreach ($model->file as $file) {
                    $model->ruta = 'archivos/' . $file->baseName . '.' . $file->extension;
                    $file->saveAs('archivos/' . $file->baseName . '.' . $file->extension);
                    $msg = "<p><strong class='label label-info'>Enhorabuena, subida realizada con éxito</strong></p>";
                }
            }
        }
        //return $this->render("upload", ["model" => $model, "msg" => $msg]);
    }

    

    
}


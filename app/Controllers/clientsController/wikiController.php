<?php
namespace App\Controllers\clientsController;
use App\Models\wiki;
use App\Models\wiki_tag;
use App\Controllers\homeController;

class wikiController extends homeController
{
    public $wiki;
    public $wiki_tag;
    public function __construct()
    {
        $this->wiki = new wiki();
        $this->wiki_tag = new wiki_tag();
    }

    public function uploadImage()
    {
        if ($_FILES['file']['error'] === 4) {
            $this->render('clients/home');
            echo '<script>
                Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Image not found!",
                        footer: "<a href="#">Why do I have this issue?</a>"
                    });
                    </script>';
        }else {
            $fileName = $_FILES['file']['name'];
            $fileSize = $_FILES['file']['size'];
            $tmpName = $_FILES['file']['tmp_name'];
            $validImageExtension = ['jpeg', 'jpg', 'png', 'gif'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension, $validImageExtension)) {
                $this->render('clients/home');
            echo '<script>
                Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Invalid Image Extension!",
                        footer: "<a href="#">Why do I have this issue?</a>"
                    });
                    </script>';
            }else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;
                move_uploaded_file($tmpName, 'assets/assetsClient/images/' . $newImageName);
                return $newImageName;

            }
        }
    }

    public function display()
    {
        $wikis = $this->wiki->display();
        $this->render('clients/home',['wikis' => $wikis]);
    }

    public function add()
    {   
        extract($_POST);
        $image = $this->uploadImage();
        $tagIds = is_array($tagId) ? $tagId : [$tagId]; 

        $this->wiki->add($title, $description, $contenue, $categorieId, $image, $tagIds);

        header('location:/viewWikiadd');
    }


    public function update()
    {
        extract($_POST);
        $image = $this->uploadImage();
        $this->wiki->update($idWiki, $title, $description, $contenue, $categorieId, $image);
        foreach ($tagId as $id) {
            $this->wiki_tag->update($idWiki, $id);
        }
        header('location:/viewWikiadd');
    }

    public function delete()
    {
        $id = $_GET['id'];
        $this->wiki->delete($id);
        $wikis = $this->wiki->displayByIdUser();
        $this->render('clients/home',['wikis' => $wikis]);
    }

    public function search()
    {
        $data_js = file_get_contents("php://input");
        $data = json_decode($data_js, true);
        $searchResults = $this->wiki->search($data['article'], $data['categorie']);

        // Send the search results as a JSON response
        header('Content-Type: application/json');
        echo json_encode($searchResults);
    }

    public function archived()
    {
        $id = $_GET['id'];
        $this->wiki->archived($id);
        $this->wikis();
    }

    public function archivedWikis()
    {
        $wikis = $this->wiki->archivedWikis();
        $this->render('admin/archivedwikis',['wikis' => $wikis]);
    }
}
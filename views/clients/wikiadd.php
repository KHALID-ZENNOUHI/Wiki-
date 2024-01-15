


<!DOCTYPE HTML>
<html>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Wiki™</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<link rel="stylesheet" href="assets/assetsClient/css/main.css" />
            <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- TinyMCE -->
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
            selector: 'textarea#tiny',
                plugins: [
                'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
                'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
                ],
                toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist checklist outdent indent | removeformat | code table help'
        })
        </script>
        <!-- tom select -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
                            <?php include(__DIR__ . '/../partials/partialsClient/header.php'); ?>

                            <!-- Add Article Form -->
                    <section>
                        <header class="major">
                            <h2>Add New Article</h2>
                        </header>
                        <?php if (isset($_GET['id'])) {?>
                        <form action="editwiki" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <label for="articleTitle">Article Title:</label>
                                <input type="text" name="title" value = "<?=$wiki->title?>" required>
                            </div>

                            <div class="form-group">
                                <label for="articleDescription">Article Description:</label>
                                <input type="text" name="description" value = "<?=$wiki->description?>" required>
                            </div>

                            <div class="form-group">
                                <label for="articleDescription">Article Categorie:</label>
                                <select name="categorieId" id="">
                                    <?php foreach ($categories as $categorie) {?>
                                        <option value="<?=$categorie->id?>" <?= ($categorie->categorie === $selectedCategorie->categorie) ?  'selected' : '' ?>><?=$categorie->categorie?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="articleDescription">Article Tags:</label>
                                <select name="tagId[]" id = "tag" autocomplete="off" multiple>
                                    <?php foreach ($tags as $tag) {?>
                                        <option value="<?=$tag->id?>" <?= in_array($tag->tag, $selectedTags) ? 'selected' :'' ?> ><?=$tag->tag?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="articleContent">Article Content:</label>
                                <!-- <textarea name="contenue"  id="tiny" required></textarea> -->
                                <textarea name="contenue" id="" cols="30" rows="10"><?=$wiki->contenue?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="articleImage">Article Image:</label>
                                <input type="file" name="file" value="<?=$wiki->image_path?>" accept = ".jpg, .png, jpeg, .gif">
                                <input type="hidden" name="idWiki" value="<?=$wiki->id?>" accept = ".jpg, .png, jpeg, .gif">
                            </div>     

                            <div class="form-group">  
                                <h1></h1>  
                                <button type="submit">Edit Article</button>
                            </div>                           
                
                        </form>
                        <?php }else {?>
                        <form action="addwiki" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <label for="articleTitle">Article Title:</label>
                                <input type="text" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="articleDescription">Article Description:</label>
                                <input type="text" name="description" required>
                            </div>

                            <div class="form-group">
                                <label for="articleDescription">Article Categorie:</label>
                                <select name="categorieId" id="">
                                <option selected>select categorie</option>
                                    <?php foreach ($categories as $categorie) {?>
                                        <option value="<?=$categorie->id?>"><?=$categorie->categorie?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="articleDescription">Article Tags:</label>
                                <select name="tagId[]" id = "tag" autocomplete="off" multiple>
                                    <option></option>
                                    <?php foreach ($tags as $tag) {?>
                                        <option value="<?=$tag->id?>"><?=$tag->tag?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="articleContent">Article Content:</label>
                                <!-- <textarea name="contenue"  id="tiny" required></textarea> -->
                                <textarea name="contenue" id="" cols="30" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="articleImage">Article Image:</label>
                                <input type="file" name="file" accept = ".jpg, .png, jpeg, .gif">
                            </div>     

                            <div class="form-group">  
                                <h1></h1>  
                                <button type="submit">Add New Article</button>
                            </div>                           
                
                        </form>
                        <?php } ?>
                        
                    </section>
                        </div> 
                    </div>                           

                <!-- Sidebar -->
				<?php include(__DIR__ . '/../partials/partialsClient/sidebar.php'); ?>

            </div>

<!-- Scripts -->
<script>
    var settings = {};
    new TomSelect('#tag', {
        plugins: ['remove_button'],
        persist: false,
        create: false,
        maxItems: 10,
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="assets/assetsClient/js/jquery.min.js"></script>
<script src="assets/assetsClient/js/skel.min.js"></script>
<script src="assets/assetsClient/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/assetsClient/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/assetsClient/js/main.js"></script>

</body>
</html>
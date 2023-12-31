<?php 
require 'config.php';
$query ="SELECT * FROM post";
$stmt=$pdo->prepare($query);
$stmt->execute();
$posts=$stmt->fetchAll(PDO::FETCH_ASSOC);
// foreach ($posts as $post){
//     echo "<p> {$post['Title']} </p>";
// }
?>


<?php include "includes/header.php"; ?>
    <main>
        <section class="py-5">
            <div class="container">
                <div class="post g-5">
                    <div class="row">
                    <article class="col-12 col-lg-8">
                        <h1 class="text-center">Featured Posts</h1>
                        <div class="post gy-4">
                            <?php foreach($posts as $post): ?>
                            <div class="col-12">
                                <div class="card">
                                    <img src="https://img.freepik.com/free-vector/online-tutorials-concept_52683-37480.jpg?size=626&ext=jpg&ga=GA1.1.1413502914.1697414400&semt=ais" alt=""
                                        height="400px" width="100%px">
                                    <div class="card-body">
                                        <h3> <?php echo $post['Title']; ?></h3>
                                        <p> <?php echo $post['Description']; ?></p>
                                        <a href="details.php">Read More...</a>
                                    </div>
                                </div>
                            </div>
                           
                            <?php endforeach; ?>
                            
                        </div>
                    </article>
                    <aside class="col-12 col-lg-4">
                        <div class="post g-4">
                            <div class="col-12 ">
                              <h3 class="mt-4">Featured Categories</h3>
                               
                                    <ul class="list-group list-group-flush list">
                                        <li class="list-group-item"><a href="">Web Design & Development</a></li>
                                        <li class="list-group-item"><a href="">Graphic & Multimedia</a></li>
                                        <li class="list-group-item"><a href="">Software Development</a></li>
                                        <li class="list-group-item"><a href="">Networking</a></li>
                                        <li class="list-group-item"><a href="">Freelancing & Digital Marketing</a></li>
                                    </ul>
                                
                            </div>
                        </div>

                    </aside>
                    </div>
                   
                </div>
                <br>
                <!-- pagination  -->
                <nav aria-label="Page  navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section>

        </section>
    </main>
<?php include "includes/footer.php" ?>
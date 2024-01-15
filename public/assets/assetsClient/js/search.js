function search() {
  const article = document.querySelector("#articlesInput").value;
  const categorie = document.querySelector("#categoriesInput").value;
  const search = document.querySelector(".search");
  const banner = document.querySelector("#banner");
  const posts = document.querySelector(".posts");
  const articles = document.querySelector(".articles");
  //const tag = document.querySelector("#tagsInput").value;
  const data = {
    article: article,
    categorie: categorie,
    //tag : tag
  };
  const dataJson = JSON.stringify(data);
  let myRequest = new XMLHttpRequest();
  myRequest.open("POST", "search", true);
  myRequest.setRequestHeader("Content-Type", "application/json");
  myRequest.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText.trim() !== "") {
        console.log(JSON.parse(this.responseText));
        let results = JSON.parse(this.responseText);
        search.addEventListener("input", (e) => {
          if (!results) return;
          banner.style.display = "none";
        //   articles.style.display = "none";
          console.log(results);
          posts.innerHTML = "";
          for (let i = 0; i < results.length; i++) {
            posts.innerHTML += `
            <article>
                <a href="#" class="image"><img src="assets/assetsClient/images/${results[i]["image_path"]}" width="416" height="256" alt="" /></a>
                <h3>${results[i]["title"]}</h3>
                <p>${results[i]["description"]}</p>
                <ul class="actions">
                    <li><a href="/wikicontent?id=${results[i]["id"]}" class="button">More</a></li>
                </ul>
            </article>`;
          }
        });
      } else {
        console.log("Empty response");
      }
    }
  };
  myRequest.send(dataJson);
}

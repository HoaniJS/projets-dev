const API = "https://jsonplaceholder.typicode.com/";

const qs = (el) => document.querySelector(el);
const qa = (el) => document.querySelectorAll(el);

const userContent = qs("#users");
const postContent = qs("#posts");
const commentContent = qs("#comments");

async function getUsers() {
    try{
        const res = await fetch(`${API}users`);
        if(!res.ok){
            throw new Error(res.status);
        };
        users = await res.json();

        users
        .sort((a,b) => a.username.localeCompare(b.username))
        .forEach(user => {
            const li = document.createElement("li");
            li.className = "list-group-item user"
            li.textContent = user.username;

            userContent.appendChild(li);

            li.addEventListener("click", () => {
                qa(".user").forEach(u => u.classList.remove("list-group-item-secondary"));
                li.classList.add("list-group-item-secondary");

                userPosts(user);
                qs(".return").addEventListener("click", returnToPosts());
            });
        });
    }
    catch(e){
        userContent.innerHTML = e;
    }
}

async function userPosts(user) {
    try{
        const res = await fetch(`${API}posts?userId=${user.id}`);
        if(!res.ok){
            throw new Error(res.status);
        };
        const posts = await res.json();

        postContent.innerHTML = "";
        if (posts.length == 0){
            postContent.innerHTML = "Pas de posts";
            return;
        }
        qs("#userName").innerHTML = user.username;
        
        posts
        .sort((a,b) => a.title.localeCompare(b.title))
        .forEach(p => {
            const li = document.createElement("li");
            li.className = "list-group-item post";
            const text = `<p><strong>${p.title}</strong></p><p>${p.body}</p>`;
            li.innerHTML = text;

            postContent.appendChild(li);

            li.addEventListener("click", () => postComments(user, p));
        });        
    }
    catch(e){
        postContent.innerHTML = e;
    }
}

async function postComments(user, post) {
    qs(".postCard").classList.remove("d-none");
    qs(".postsCard").classList.add("d-none");

    try{
        const res = await fetch(`${API}comments?postId=${post.id}`);
        if (!res.ok){
            throw new Error(res.status);
        }
        const comments = await res.json();
        
        qs("#postTitle").innerHTML = post.title;
        qs("#postAuthor").innerHTML = `Par <strong>${user.username}</strong>`;
        qs("#postText").innerHTML = post.body;

        if (comments.length == 0){
            commentContent.innerHTML = "Pas de commentaires";
            return;
        }

        comments.forEach( c => {
            const li = document.createElement("li");
            li.className = "list-group-item comment";
            const text = `<p><strong>${c.name}</strong></p><p>${c.body}</p>`;
            li.innerHTML = text;

            commentContent.appendChild(li);
        });
    }
    catch(e){

    }
}

qs(".return").addEventListener("click", returnToPosts());

getUsers();

function returnToPosts(){
    qs(".postCard").classList.add("d-none");
    qs(".postsCard").classList.remove("d-none");
}
/***********
 * CLASSES *
 ***********/

class Task {
    static compt = 0;

    #id;
    #titre;
    #description;
    #statut;
    #createdAt;
    #couleur;

    constructor(titre, description=""){
        this.#id = compt;
        this.#titre = titre.trim();
        this.description = description.trim();
        this.#statut = "à faire";
        this.#createdAt = Date.now();
        this.#couleur = "primary";

        compt++;
    }

    getId(){return this.#id;}
    getTitre(){return this.#titre;}
    getDescription(){return this.#description;}
    getStatut(){return this.#statut;}
    getCreatedAt(){return this.#createdAt;}
    getCouleur(){return this.#couleur;}

    #setTitre(titre){this.#titre = titre.trim();}

    #setDescription(description){this.#description = description.trim()}

    #setStatut(statut){
        this.#statut = statut;
        switch(statut){
            case "à faire":
                this.#couleur = "primary";
                break;
            case "en cours":
                this.#couleur = "warning";
                break;
            case "terminée":
                this.#couleur = "success";
                break;
            case "à faire":
                this.#couleur = "danger";
                break;
            default:
                break;
        }
    }

    update(titre=this.#titre, description=this.#description, statut=this.#statut){
        this.#setTitre(titre);
        this.#setDescription(description);
        this.#setStatut(statut);
    }

    toJSON(){
        let res = `{\n  "id": "${this.#id}",\n    "titre": "${this.#titre}",\n    `
            + `"description": "${this.#description}",\n    "statut": "${this.#statut}",\n    `
            + `"createdAt": "${this.#createdAt.toJSON()}",\n    "couleur": "${this.#couleur}"\n}`;
        return res;
    }
}

class TaskManager {
    #tasks;

    constructor(tasks=[]){
        this.#tasks = tasks
    }

    add(task){
        this.#tasks.push(task);
    }

    getAll(){
        return this.#tasks;
    }

    findById(id){
        let task = null;
        let i = 0;
        while(task == null){
            if(this.#tasks[id].getId() == id){
                task = this.#tasks[id];
            }
            i++;
        }
        return task;
    }

    update(id, titre=this.#tasks[id].getTitre(), description=this.#tasks[id].getDescription(), statut=this.#tasks[id].getStatut()){
        this.#tasks[id].update(titre, description, statut);
    }

    remove(id){
        this.#tasks.splice(id, 1);
    }

    filterByStatut(statut){
        let res = [];
        this.#tasks.forEach(task => {
            if(task.getStatut() == statut){
                res.push(task);
            }
        });
        return res;
    }

    search(texte){
        let res = [];
        this.#tasks.forEach(task => {
            if(task.getTitre().indexOf(texte) > -1 || task.getDescription().indexOf(texte) > -1){
                res.push(task);
            }
        });
        return res;
    }

    sortByDate(order){
        let res = [...this.#tasks];
        switch(order){
            case "asc":
                res.sort((a, b) => a.getCreatedAt() - b.getCreatedAt());
                break;
            case "desc":
                res.sort((a, b) => b.getCreatedAt() - a.getCreatedAt());
                break;
            default:
                break;
        }
        return res;
    }

    save(){

    }

    load(){
        
    }
}
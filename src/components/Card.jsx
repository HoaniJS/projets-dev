function Card(props) {
    const {path, title, release_date} = props
    return (
        <div style={{overflow: "auto"}} className="max-w-[225px] mx-auto mt-6 px-2 py-4 sm:px-6 lg:px-8 border-2 rounded-md">
            <img class="max-h-[250px] w-auto" src={`./src/assets/img/${path}`} alt={`Affiche de ${title}`}/>
            <div class="relative">
                <button class="text-2xl absolute -top-8 right-0" style={{cursor: "pointer"}}>❤️</button>
            </div>
            <div>
                <h3 class="font-bold line-clamp-1">{title}</h3>
                <p>Sorti le {new Date(release_date).toLocaleDateString("fr")}</p>
            </div>
        </div>
    )
}

export default Card
import { useState } from "react"

export default function Tab(props) {
    // tableau de donnees
    // boucle sur le tableau pour creer les button .map()
    // je sauvegarde dans une variable d'etat l'indice du tableau

    // j'affiche le contenu correspond a l'indice selectionné

    const [selectedTab, setSelectedTab] = useState(0)
    const tabsData = props.tabsData

    return (
        <>
            <div className='border max-w-2xl mb-10'>
                <div className='flex outline'>
                    {tabsData.map((data, indice) => (
                        <button
                            key={indice}
                            onClick={() => {
                                setSelectedTab(indice);
                            }}
                            style={{cursor: "pointer"}}
                            className="w-full px-6 py-2 bg-gray-500 text-white hover:bg-gray-600 transition-colors"
                        >
                            {data.buttonContent}
                        </button>
                    ))}
                </div>
                <div className="p-2">
                    <h2 className="text-2xl font-bold text-gray-800 text-center">{tabsData[selectedTab].tabHeading}</h2>
                    <p>{tabsData[selectedTab].txt}</p>
                </div>
            </div>
        </>
    )
}
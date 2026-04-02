import { useEffect, useState } from 'react'

function App() {
    const STORAGE_KEY = 'todoList_v1'
    const [task, setTask] = useState('')
    const [todoList, setTodoList] = useState(() => {
      try{
        const raw = localStorage.getItem(STORAGE_KEY)
        return raw ? JSON.parse(raw) : []
      }
      catch{
        return []
      }
    })

    useEffect(() => {
      try{
        localStorage.setItem(STORAGE_KEY, JSON.stringify(todoList))
      }
      catch{
        console.error('Impossible de sauvegarder la todo list')
      }
    }, [todoList])

    const handleInput = (e) => setTask(e.target.value)

    console.log(todoList)
    return (
        <div className="m-4 w-fit">
            <form className='mb-6'
                onSubmit={(event) => {
                    event.preventDefault()
                    if (task.trim() === '') return
                    setTodoList([...todoList, task])
                    console.log(todoList)
                }}
            >
                <label htmlFor='task' className="block text-sm font-medium text-gray-900">Que voulez-vous faire?</label>
                <input type='text' placeholder='Ajouter une tâche' value={task} onChange={handleInput} id='task' className="my-2 bg-gray-50 border border-gray-300 rounded-sm block p-2.5 text-sm focus:ring-blue-500 focus:border-blue-500"/>
                <button type='submit' style={{cursor: "pointer"}} className="block text-white bg-blue-700 font-semibold rounded-lg text-sm px-5 py-2.5 text-center hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Ajouter</button>
            </form>

            <ul>
              {todoList.map((todo, index) => (
              <li
                  key={index}
                  className='flex text-sm font-medium items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors'
                  onDoubleClick={(e) => {
                      e.currentTarget.classList.toggle('line-through');
                  }}
              >
                  {todo}
                  <button
                    style={{cursor: "pointer"}}
                    className='ml-4 my-2 px-4 py-2 text-white bg-red-700 font-semibold rounded-lg text-sm px-5 py-2.5 my-2 text-center hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 transition-colors text-sm font-medium'
                    onClick={() => {
                        setTodoList(
                            todoList.filter((todo, i) => {
                                return i !== index;
                            })
                        );
                    }}
                  >
                      Supprimer
                  </button>
              </li>
                ))}
            </ul>
            {/* rendre fonctionnel le bouton supprimer, retirer l'element de la todoList */}
            {/* Doucle cliquer sur le texte de la tache barre le texte (pour dire que ce la a été fait et doucble cliquer à nouveau retire la barre) */}
        </div>
    );
}

export default App

import { ColorContext } from './contexts/ColorContext';
import { Routes, Route } from 'react-router-dom';
import { useState } from 'react';
import Counters from './pages/Counters';
import Header from './components/Header';
import Home from './pages/Home';
import Tabs from './pages/Tabs';

function App() {
  const [color, setColor] = useState('')

  return (
    <>
      <Header/>
      <div className='min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-8'>
        <div className='mb-8'>
          <label for="colors" className="block mb-2 text-sm font-medium text-gray-900">Choisissez une couleur</label>
          <select id="colors" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value={color} onChange={(e) => setColor(e.target.value)}>
            <option value="black" selected>Noir</option>
            <option value="pink">Rose</option>
            <option value="green">Vert</option>
            <option value="blue">Bleu</option>
          </select>
          {/* <label for="index" class="block mb-2 text-sm font-medium text-gray-900">Saisissez un nombre</label>
            <input type="text" id="index" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Entrez l'indice du tableau"/> */}
        </div>
        <ColorContext.Provider value={color}>
          <Routes>
            <Route path='/' element={<Home />}></Route>
            <Route path='/counters' element={<Counters />} />
            <Route path='/tabs' element={<Tabs />} />
          </Routes>
        </ColorContext.Provider>
      </div>
    </>
  )
}

export default App

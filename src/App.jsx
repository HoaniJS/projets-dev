import { Routes, Route } from 'react-router-dom'
import Favorites from './pages/Favorites'
import Header from './components/Header'
import Home from './pages/Home'

function App() {
  return (
    <>
      <Header/>
      <main>
        <Routes>
          <Route path='/' element={ <Home/> }/>
          <Route path='/favorites' element={ <Favorites/> }/>
        </Routes>
      </main>
    </>
  )
}

export default App

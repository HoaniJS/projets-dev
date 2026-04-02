import Favorite from './pages/Favorite'
import Header from './components/Header'
import Home from './pages/Home'
import { Routes, Route } from 'react-router-dom'

function App() {
  return (
    <>
      <Header/>
      <main>
        <Routes>
          <Route path='/' element={ <Home/> }/>
          <Route path='/favorite' element={ <Favorite/> }/>
        </Routes>
      </main>
    </>
  )
}

export default App

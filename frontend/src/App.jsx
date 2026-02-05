import './App.scss'
import {Header} from './components/layout/Header/Header.jsx';
import {Footer} from './components/layout/Footer/Footer.jsx';
import {ModalAuth} from "./components/layout/ModalAuth/ModalAuth.jsx";
import {HomePage} from './pages/HomePage/HomePage.jsx';
import {Books} from './pages/Books/Books.jsx';
import {Contact} from './pages/Contact/Contact.jsx';
import {Route, Router, Routes} from "react-router";
import {useState} from "react";

function App() {
  const [loginOpen, setLoginOpen] = useState(false);
  return (
    <>
      <Header setLoginOpen={setLoginOpen} />

      <Routes>
        <Route index element={<HomePage />}/>
        <Route path="books" element={<Books />}/>
        <Route path="contact" element={<Contact />}/>
      </Routes>

      {loginOpen && <ModalAuth setLoginOpen={setLoginOpen} />}

      <Footer />
    </>
  )
}

export default App
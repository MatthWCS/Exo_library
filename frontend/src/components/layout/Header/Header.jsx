import logo from "../../../../public/logo.png"
import {useState} from "react";
import {NavLink} from 'react-router';

export const Header = ({setLoginOpen}) => {
  const [isOpen, setIsOpen] = useState(false);

  return (

      <header className="bg-primary flex-container">

        <NavLink to="/" className="text-secondary col-9"><img src={logo} alt="logo Game of Tomes" className="logo" loading="lazy"/><span>Game of Tomes</span></NavLink>

        <button onClick={() => setLoginOpen(prev => !prev)} className="col-1"><i className="ph ph-user-circle text-secondary"></i></button>

        <button onClick={() => setIsOpen(!isOpen)} className="col-2"><i className="ph ph-list burger text-secondary"></i></button>
        <aside className={"bg-primary sidebar " + (isOpen ? "open" : "")}>
          <NavLink to="/books" className="text-secondary" onClick={() => setIsOpen(false)}>Livres</NavLink>
          <NavLink to="/contact" className="text-secondary" onClick={() => setIsOpen(false)}>Contact</NavLink>
        </aside>

      </header>
  )
}
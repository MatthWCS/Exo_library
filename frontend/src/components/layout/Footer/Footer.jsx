import {NavLink} from "react-router";

export const Footer = () => {
  return (
      <footer className="text-light">

        <section className="top flex-container">
          <article className="liste col-12">
            <NavLink to="/books" className="text-light">Livres</NavLink>
            <NavLink to="/contact" className="text-light">Contact</NavLink>
            <a href="" className="text-light">Conditions générales d'utilisation</a>
            <a href="" className="text-light">Conditions générales de vente</a>
            <a href="" className="text-light">Politique de confidentialité</a>
          </article>
        </section>

        <section className="bottom">
          <p><i className="ph ph-copyright"></i> Julien Jonathan Matthieu</p>
          <a href="" className="text-light">Mentions légales</a>
        </section>
      </footer>
  )
}
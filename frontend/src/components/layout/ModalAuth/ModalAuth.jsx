import React, {useState} from 'react';
import {Input} from "../../common/Input/Input.jsx"
import logo_fb from "../../../assets/img/logo_fb.jpg"
import logo_google from "../../../assets/img/logo_google.jpg"

export const ModalAuth = ({setLoginOpen}) => {
  const [isRegister, setIsRegister] = useState(false);
  return (
      <>
        <section className="modal-login" onClick={() => setLoginOpen(false)}>
          <article className="form-connexion modal-content" onClick={(e) => e.stopPropagation()}>

            {!isRegister ? (
                <>
                  <h2>Connexion</h2>
                  <form action="">
                    <div className="logo-connect">
                      <a href="" className="fb-connexion"><img src={logo_fb} alt="logo connect Facebook" /></a>
                      <a href="" className="google-connexion"><img src={logo_google} alt="logo connect Google" /></a>
                    </div>

                    <h3>ou</h3>

                    <Input inputName="email" inputType="email" labelText="Email" inputComplete="email"/>
                    <Input inputName="password" inputType="password" labelText="Mot de passe" inputComplete="off"/>

                    <button className="bg-secondary border-secondary submit">Confirmer</button>

                    <div className="pratique">
                      <button onClick={() => setIsRegister(true)} className="text-light">Pas encore Inscrit ?</button>
                      <a href="" className="text-light">Mot de passe oublié ?</a>
                    </div>
                  </form>
                </>
            ) : (
                <>
                  <h2>Inscription</h2>
                  <form action="">
                    <div className="logo-connect">
                      <a href="" className="fb-connexion"><img src={logo_fb} alt="logo connect Facebook" /></a>
                      <a href="" className="google-connexion"><img src={logo_google} alt="logo connect Google" /></a>
                    </div>

                    <h3>ou</h3>

                    <Input inputName="username" inputType="username" labelText="Pseudo" inputComplete="username"/>
                    <Input inputName="email" inputType="email" labelText="Email" inputComplete="email"/>
                    <Input inputName="password" inputType="password" labelText="Mot de passe" inputComplete="off"/>
                    <Input inputName="confirm-password" inputType="password" labelText="Confirmer mot de passe" inputComplete="off"/>

                    <button className="bg-secondary border-secondary submit">S'inscrire</button>

                    <div className="pratique-register">
                      <button onClick={() => setIsRegister(false)} className="text-light">Déjà Inscrit ?</button>
                    </div>
                  </form>
                </>
            )}

          </article>
        </section>
      </>
  )
}
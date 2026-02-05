import {Input} from "../../components/common/Input/Input.jsx";
import React from "react";

export const Contact = () => {
  return (
    <>
      <section className="form-container">
        <h1>Contactez-moi</h1>

        <form action="">

          <Input inputName="firstname" inputType="text" labelText="Prénom" inputComplete="firstname"/>
          <Input inputName="lastname" inputType="text" labelText="Nom de famille" inputComplete="lastname"/>
          <Input inputName="email" inputType="email" labelText="Email" inputComplete="email"/>
          <label htmlFor="message">Message</label>
          <textarea id="message"></textarea>

          <button className="bg-secondary border-secondary submit">Envoyer message</button>
        </form>
      </section>

      <section className="infos-contact bg-primary">

        <article>
          <h2><i className="ph ph-map-pin"></i>Adresse</h2>
          <p>12 Adresse aléatoire 88520 Quelquepart</p>
        </article>

        <article>
          <h2><i className="ph ph-phone"></i>Téléphone</h2>
          <p>03 88 00 00 00</p>
        </article>

        <article>
          <h2><i className="ph ph-envelope"></i>Email</h2>
          <p>mail.fictif@chepa.com</p>
        </article>

        <article className="social">
          <h2>Réseaux Sociaux</h2>
          <a href="https://facebook.com" target="blank" aria-label="lien vers facebook"><i className="ph ph-facebook-logo text-dark"></i></a>
          <a href="https://instagram.com" target="blank" aria-label="lien vers instagram"><i className="ph ph-instagram-logo text-dark"></i></a>
          <a href="https://tiktok.com" target="blank" aria-label="lien vers tiktok"><i className="ph ph-tiktok-logo text-dark"></i></a>
        </article>
      </section>
    </>
  )
}
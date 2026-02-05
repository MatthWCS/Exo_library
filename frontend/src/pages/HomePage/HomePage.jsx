

export const HomePage = () => {
  return (
      <>
        <section className="titre">
          <article className="bg-bg">
            <h1>Game of Tomes</h1>
            <h2>Accéder au site</h2>
            <a href="#livre" aria-label="descends vers le livre du mois">
              <i className="ph ph-arrow-circle-down"></i>
            </a>
          </article>
        </section>

        <section id="livre">
          <h2>Le livre du mois</h2>


        </section>
      </>
  )
}
<div class="m-10 space-y-4">
<div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat bg-center p-12 text-center h-[300px] xs:h-[400px] md:h-[500px]" style="background-image: url('img/home-poster.png');">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="flex h-full items-center justify-center">
                <div class="text-white">
                    <div class="mb-4 text-4xl font-semibold ">Waw Travel</div>
                    <div class="mb-6 text-xl font-semibold">New Horizons, Waw dévoile l'aventure.</div>
                    
                    <?php if (isset($_SESSION['user'])) : ?>
                <a href="?page=/roadtrips" class="rounded border border-1 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-[#58463E] hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 ">RoadTrips</a>
            <?php else : ?>
                <a href="?page=/inscription" class="rounded border border-1 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-[#58463E] hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 " >
                        S’inscrire Maintenant
                    </a>
        <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center items-center">
        <div class="text-3xl font-semibold m-2 py-4"> Waw Travel en quelques mots</div>
        <div class="text-xl text-center m-10 p-2"> L’agence de communication « New Horizons » excelle dans le design, le marketing, la communication et le développement, ciblant spécifiquement les passionnés du plein air, des voyages, des sports nautiques et des activités en montagne.</div>
    </div>

    <div class="flex flex-col md:flex-row items-center justify-center">
        <img class="order-2 max-w-lg md:w-1/2 rounded-lg object-cover md:mr-8 md:order-1" src="img/connectedPoster.jpg" alt="
        Image">
        <div class="order-1 w-full md:w-1/2 mt-6 md:mt-0 text-center p-6 md:order-2">
            <h2 class="text-2xl font-bold mb-2 text-[#58463E]">Le Voyage Connecté</h2>
            <p>Remarquant la croissance exponentielle des voyageurs partageant leurs road trips sur les réseaux sociaux, notamment sur Instagram, New Horizons perçoit un potentiel captivant. Nous envisageons de concrétiser cette vision à travers "Waw" (pour "Where Are We"), une plateforme où les utilisateurs partageront leurs aventures avec famille et amis.</p>
        </div>
    </div>
    
    <div class="flex flex-col md:flex-row items-center justify-center">
       <div class="orde-2 w-full md:w-1/2 mt-6 md:mt-0 text-center p-6 md:order-1">
            <h2 class="text-2xl font-bold mb-2 text-[#58463E]">Le Futur de Waw</h2>
            <p>Au-delà de la communauté, Waw a pour objectif d'évoluer en intégrant la vente commissionnée d'articles de voyage, camping et sport via notre réseau de partenaires. Notre plateforme deviendra ainsi une passerelle vers l'équipement idéal pour chaque aventure.</p>
        </div>
        <img class="order-1 max-w-lg md:w-1/2 rounded-lg object-cover md:mr-8 md:order-2" src="img/connectedPoster1.jpg" alt="Image">
    </div>

    <div class="flex flex-col md:flex-row items-center justify-center">
        <img class="order-2 max-w-lg md:w-1/2 rounded-lg object-cover md:mr-8 md:order-1" src="img/connectedPoster2.jpg" alt="Image">
        <div class="order-1 w-full md:w-1/2 mt-6 p-6 md:mt-0 text-center md:order-2">
            <h2 class="text-2xl font-bold mb-2 text-[#58463E]">Waw - Où l'Aventure Commence</h2>
            <p>Entièrement gratuite, la plateforme Waw rassemblera une communauté d'adeptes des road trips. Elle permettra aux utilisateurs de créer des carnets de voyage détaillés, partageables facilement via une page web publique. </p>
        </div>
    </div>
</div>
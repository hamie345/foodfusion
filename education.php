<?php
session_start();

require './header.php';
?>


<main>
    <h2>Educational Resources</h2>
    <p>Learn about sustainable cooking and renewable energy in the kitchen.</p>
    
    <!-- Downloadable Resources Section -->
    <section class="resources">
        <h3>Downloadable Resources</h3>
        <ul>
            <li><a href="downloads/solar_energy_guide.pdf" download>Solar Energy Guide (PDF)</a></li>
            <li><a href="downloads/wind_power_basics.pdf" download>Wind Power Basics (PDF)</a></li>
            <li><a href="downloads/renewable_energy_tips.pdf" download>Renewable Energy Tips (PDF)</a></li>
        </ul>
    </section>

    <!-- Infographics Section -->
    <section class="infographics">
        <h3>Infographics</h3>
        <img src="images/solar_infographic.jpg" alt="Solar Energy Infographic">
        <img src="images/wind_energy_chart.png" alt="Wind Energy Chart">
    </section>

    <!-- Videos Section -->
    <section class="videos">
        <h3>Educational Videos</h3>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/dP9V36BbV4U" frameborder="0" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/m-42ux2fBkE" frameborder="0" allowfullscreen></iframe>
    </section>
</main>

<?php
require './footer.php';
?>
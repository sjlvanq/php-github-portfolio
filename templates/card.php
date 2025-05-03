<div class="bg-blue-500 shadow-md p-4 rounded-xl text-white card">
  <div class="flex justify-between items-center mb-2">
    <h2 class="font-bold text-xl hover:underline cursor-pointer" onClick='getReadme("<?php echo htmlspecialchars($repo["name"]); ?>")'>
      <?php echo htmlspecialchars($repo["name"]); ?>
    </h2>
    <?php if (!empty($repo["language"])): ?>
      <span class="bg-white ml-4 px-2 py-1 rounded font-semibold text-blue-600 text-sm">
        <?php echo htmlspecialchars($repo["language"]); ?>
      </span>
    <?php endif; ?>
  </div>
  <p class="mb-4"><?php echo htmlspecialchars($repo["description"] ?? "Sin descripción"); ?></p>
  <div class="flex justify-between items-center mb-2">
    <a href="<?php echo htmlspecialchars($repo["html_url"]); ?>"
      class="hover:text-blue-200 underline"
      target="_blank"
      rel="noopener noreferrer">
        Ver en GitHub
    </a>
    <img class="cursor-pointer" onClick='getReadme("<?php echo htmlspecialchars($repo["name"]); ?>")' src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAA2RJREFUaEPtWF1IU2EYfr7v7Dfn76TpdqYuauG/qwuLjCgiIovKFCxLCfy5SYhEibrpShCU0hRCKIq6q5tSkcCLAjEjsdTqoi4qIXWWplsZup0tztBosNrPqeNm57sb3973e5/3ed/zvd9DEOGLRHj8kACsNoMSAxIDAjMglZDABAo2//8YkCXHXwRIOZFRKih9bhCndc5AQEAZxkUocRHKcMrYmMmlBXvD4hd7VyD+g2KA0UZXaAoy23X1xRrQoEx9x8K5MF7V6khNt7gXpqYVlooyfOgfgPXlq+mpF2PbALzzByKoKBT6xF5DW81+PviZG4+hzjYi9tBWf2f8cX/x7QSm628u5VdXKvRb8tDf0oaskiLuYd350xzH3fbnPFAAZgBHqUZVHXesYIO9bwwuxgRCbGAbC6EwJfk757f7jslZTFR1OArO1sq15o142n4NeaeOo/tMXQ3ncHT6cxwoAC0AC43XtOjOFeXM3RuEYz4BcFqRcvUkZLo4f+esOgBPAPJk7SNjZ+0uRqOCrW8EKnMylJsMIQfPG4rFgBcAmTZaUNC/Gq8KAMCN2Tv9niaO3pMtCIxYANIA7KMadV1CxV7zfM8wXEgFdc3A0HQEitT1IYMQCwD/mdkpi1t3SVtTmDH3YAjOBR2I6xOMV0ohT04IewBePUBVcsx3D0GVzkKdw5MT+hKLgbXVxISh4O8CVSaLqO2bQ0+/iJ9RFsCBlSa29T4H52RBMQO2uRhyNjFkEGKVkA8ABhDMwNhcEhEAvHqAyCjm7g5ClW1EVD4/JoW+xGJgbTUxVcox3/UMqgwW6lxT6OkXsYm9L7L7Q3B+X77ILpdCrg//i8xrlLD1DIPjRwn3LAxNh6FICf9RwqsH+B+eYS7HiOjdWRFRQmuriZko5fKDRg+lOTIeNL6flJwVKW1lkOniQy4jse4BH4/6NBBiB9t4EAqTLuwBeAJckVUIQ/D5+mOoc42ILRQoq7z5iOmGW/9cVvEAYLQx5VE70juSGnhhS5gw53HIC1uVrY60DIv7Gy9slZ/A+MATTI2+tk6NjPLC1nt/1AYqq/z0I9PFXwAlFX9fWqQuwlBOGRMzsWT/Wr9os/X4C57fDxpAIE7F/I8EQMxs+zpLYkBiQGAGpBISmEDB5hIDglMo0MEPb6BbT9Ql2E8AAAAASUVORK5CYII=" alt="README icon" />
  </div>
</div>

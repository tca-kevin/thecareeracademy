import Alpine from 'alpinejs';
import Collapse from "@alpinejs/collapse";
import Focus from "@alpinejs/focus";
import Intersect from "@alpinejs/intersect";
import Mask from "@alpinejs/mask";
import Morph from "@alpinejs/morph";
import Persist from "@alpinejs/persist";
import UI from "@alpinejs/ui";

Alpine.plugin(Collapse);
Alpine.plugin(Focus);
Alpine.plugin(Intersect);
Alpine.plugin(Mask);
Alpine.plugin(Morph);
Alpine.plugin(Persist);
Alpine.plugin(UI);

window.Alpine = Alpine;

Alpine.start();

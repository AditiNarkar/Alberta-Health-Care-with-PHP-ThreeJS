import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.118/build/three.module.js';
import {GLTFLoader} from 'https://cdn.jsdelivr.net/npm/three@0.118.1/examples/jsm/loaders/GLTFLoader.js';
import {OrbitControls} from 'https://cdn.jsdelivr.net/npm/three@0.118/examples/jsm/controls/OrbitControls.js';
    
let canvas = document.querySelector('.webgl');

let scene = new THREE.Scene();

let width= 500;
let height= 300;

const camera = new THREE.PerspectiveCamera(85, width/height, 0.1, 600);
camera.position.set(20, 40, 170);
scene.add(camera);

const renderer = new THREE.WebGLRenderer({canvas: canvas });
renderer.shadowMap.enabled = true;
renderer.shadowMap.type = THREE.PCFSoftShadowMap;
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(width,height);
document.body.appendChild(renderer.domElement);

scene.background = new THREE.Color(0xdbfcff);

let controls = new OrbitControls(camera, renderer.domElement);
controls.target.set(0, 40, 1);
controls.update();

let plane = new THREE.Mesh(
    new THREE.PlaneGeometry(200, 130),
    new THREE.MeshStandardMaterial({color: 0x09b300, side: THREE.DoubleSide})
);
plane.receiveShadow = true;
plane.castShadow = false;
plane.rotation.x = -Math.PI / 2;
plane.position.z += 20;
scene.add(plane);

let light = new THREE.DirectionalLight(0xFFFFFF, 1.0);
light.position.set(50,60,40);
light.castShadow = true;
light.target.position.set(0, 0, 0);
light.shadow.bias = -0.001;
light.shadow.mapSize.width = 2048;
light.shadow.mapSize.height = 2048;
light.shadow.camera.near = 0.1;
light.shadow.camera.far = 500.0;
light.shadow.camera.near = 0.5;
light.shadow.camera.far = 500.0;
light.shadow.camera.left = 100;
light.shadow.camera.right = -100;
light.shadow.camera.top = 100;
light.shadow.camera.bottom = -100;
scene.add(light);

light = new THREE.AmbientLight(0xFFFFFF);
scene.add(light);

window.addEventListener('resize', () => 
{
    renderer.setSize(width, height);
    camera.aspect = width/height;
    camera.updateProjectionMatrix();
});


const gltfloader = new GLTFLoader();
gltfloader.load('hospital1/scene.gltf',(gltf) => {
    gltf.scene.traverse(c => { c.castShadow = true; });
    gltf.scene.scale.set(25, 25, 25);//to scale
    scene.add(gltf.scene);
});

function animate(){
    requestAnimationFrame(animate);
    renderer.render(scene, camera);
}
animate();
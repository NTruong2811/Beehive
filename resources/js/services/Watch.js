import instance from "./config";

export function Watch(page){
    return instance.get('/watch?page='+ page);
}
export function Musics(page){
    return instance.get('/watch/musics?page='+ page);
}
export function Videos(page){
    return instance.get('/watch/videos?page='+ page);
}
import instance from "./config";

export function Watch(){
    return instance.get('/watch');
}
var letter;

while (!letter)
letter = prompt('Type a letter here.');

for (var i = 0; i < 10; i++){
document.write(letter + '<br>');
}

for (var m = 0; m < 10; m++)
{
for (var f = 0; f < m + 1; f++){
document.write(letter);
}
document.write('<br>');
}
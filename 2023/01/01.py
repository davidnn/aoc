from re import sub

total = 0
f = open('input.txt', 'r')
for line in f:
    cleaned_line = sub('\D', '', line)
    first_and_last_int = int(cleaned_line[0] + cleaned_line[-1])
    total += first_and_last_int
f.close()
print(total)
